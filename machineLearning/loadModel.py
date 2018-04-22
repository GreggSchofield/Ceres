# Python script description...

# Author: Gregg Schofield
# Created: 22/04/18

# Import the keras module
import keras

# Load/reinstantiate the model from the given path. This will also
# re-compile the model with the saved training configuration provided
# that the model has been compiled at least once.
model = load_model('')

# Alternatively, you may load/reinstantiate the model form a JSON
# string.
#model = model_from_json(JSONString)
