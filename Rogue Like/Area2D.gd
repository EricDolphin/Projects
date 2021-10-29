extends Area2D

const BULLET = preload("res://Bullet.tscn")
# Declare member variables here. Examples:
# var a = 2
# var b = "text"


# Called when the node enters the scene tree for the first time.
func _ready():
	pass # Replace with function body.

	if Input.is_mouse_button_pressed(BUTTON_LEFT):
		var direction = (get_global_mouse_position() - global_position).normalized()
		var bullet = BULLET.instance()
		get_parent().add_child(bullet)
		bullet.position = $Position2D.global_position

# Called every frame. 'delta' is the elapsed time since the previous frame.
#func _process(delta):
#	pass
