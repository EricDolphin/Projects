extends Label

var friction = 80
var format_string = "Acceleration modify value = "



#TESTING PURPOSES FOR FRICTION VARIATION
func _process(delta):
	set_text(str(friction))
	if Input.is_action_just_released("value_up"):
		friction = friction + 10
	elif Input.is_action_just_released("value_down"):
		friction = friction - 10

#func value_change():



