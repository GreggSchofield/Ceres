# Python script description...

# This python script was written in keras, an open source convolutional
# neural-network library library written in Python. Keras is essentially a
# wrapper language for Google's TensorFlow library, which enables you to
# build machine-learning models quickly.
# Author: Gregg Schofield
# Created: 22/04/18

# Import the keras and numpy modules
import keras
import numpy as np

# Import...
from parser import load_data

# Load the training and testing data from their respective directories within
# the server
training_data = load_data('')
validation_data = load_data('')

# Build the
model = Sequential()
model.add(Convolutional2D(32,3,3 input_shape=(img_width,img_height,3)))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2,2)))

model.add(Convolutional2D(32,3,3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2,2)))

model.add(Convolutional2D(32,3,3))
model.add(Activation('relu'))
model.add(MaxPooling2D(pool_size=(2,2)))

#
model.add(Flatten())
model.add(Dense(64))
model.add(Activation('relu'))
model.add(Dropout(0.5))
model.add(Dense(1))
model.add(Activation('sigmoid'))

#
model.compile(loss='binary_crossentropy',optimizer='rmsprop',metrics=['accuracy'])

# Now train the model
model.fit_generator(training_data,
                    samples_per_epoch=2048,
                    nb_epoch=30,
                    validation_data=validation_data,
                    nb_val_samples=832)

# Save the entire model into a hierarchical data format file.
# This includes the model architecture, weights and optimizer state.
model.save_weights('cnn.h5')

# Alternatively, you may save only the architecture of the model as a JSON
# string.
#JSONString = model.to_json()
