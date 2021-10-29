extends KinematicBody2D

#Initial movement related values
var MAX_SPEED = 500
var ACCELERATION = 3000
var motion = Vector2()
var accel_modify = 300
const BULLET = preload("res://Bullet.tscn")

#Modify the Acceleration modifier in game
#TESTING PURPOSES
func _process(delta):
	if Input.is_action_just_released("value_up"):
		accel_modify = accel_modify + 10
	elif Input.is_action_just_released("value_down"):
		accel_modify = accel_modify - 10
		

#Applies acceleration and Friction during player movement
func _physics_process(delta):
	var axis = get_input_axis()
	if axis == Vector2.ZERO:
		apply_friction(ACCELERATION * delta + accel_modify)
	else:
		apply_movement(axis * ACCELERATION * delta)
	motion = move_and_slide(motion)
	
	if Input.is_mouse_button_pressed(BUTTON_LEFT):
		var bullet = BULLET.instance()
		get_parent().add_child(bullet)
		bullet.position = $Position2D.global_position


#Gets the direction the player is moving in by checking if x and y are positive or negative
func get_input_axis():
	
	var axis = Vector2.ZERO
	axis.x = int(Input.is_action_pressed("move_right")) - int(Input.is_action_pressed("move_left"))
	axis.y = int(Input.is_action_pressed("move_down")) - int(Input.is_action_pressed("move_up"))
	return axis.normalized()



#Calculates friction to apply to player slow the player during turns or when they stop inputs
func apply_friction(amount):
	if motion.length() > amount:
		motion -= motion.normalized() * amount 
	else:
		motion = Vector2.ZERO

#Calculates Acceleration player recieves during movement and caps at max speed
func apply_movement(acceleration):
	motion += acceleration
	motion = motion.clamped(MAX_SPEED)

#Function to die
func die():
	get_tree().reload_current_scene()
	
#Checks if the player and enemy have collided
func _on_Area2D_area_entered(area):
	if "bad" in area.get_name():
		die()


