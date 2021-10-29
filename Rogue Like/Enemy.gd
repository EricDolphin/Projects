extends KinematicBody2D

#Initial movement variables and a variable to borrow variables from "player" script
onready var player = get_node('../Player')
var velocity = Vector2()
var speed = 100
var ACCELERATION = 300
var motion = Vector2()
var MAX_SPEED = 500

#Checks where the player is and applies movement in that direction.
#The movement related functions are identical to the player in functionality and mostly are the same
func _process(delta):
	if player.position.x > position.x:
		velocity.x += speed
	if player.position.x < position.x:
		velocity.x -= speed
	if player.position.y > position.y:
		velocity.y += speed
	if player.position.y < position.y:
		velocity.y -= speed

func _physics_process(delta):
	var axis = get_input_axis()
	if axis == Vector2.ZERO:
		apply_friction(ACCELERATION * delta)
	else:
		apply_movement(axis * ACCELERATION * delta)
	motion = move_and_slide(motion)

#finds what direction the enemy is moving in by finding the distance between it and the player on the x and y axis
func get_input_axis():
	var axis = Vector2.ZERO
	axis.x = player.position.x - position.x
	axis.y = player.position.y - position.y
	return axis.normalized()
	
func apply_friction(amount):
	if motion.length() > amount:
		motion -= motion.normalized() * amount 
	else:
		motion = Vector2.ZERO

func apply_movement(acceleration):
	motion += acceleration
	motion = motion.clamped(MAX_SPEED)
