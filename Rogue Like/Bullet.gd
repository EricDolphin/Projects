extends Area2D

var vel = Vector2()
var speed = 300
var mouse_pos = get_global_mouse_position()
var mx = mouse_pos.x
var my = mouse_pos.y
onready var direction = get_node('../Player').direction

func _ready():
	print (mx)
	print (my)
	pass

func _process(delta):
	position += speed * delta * direction

func _physics_process(delta):
	vel.x = speed * delta * mx
	translate(vel)




func _on_VisibilityNotifier2D_screen_exited():
	queue_free()
