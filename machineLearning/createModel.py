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

# Create a sequential model (simpler than a standard graph model) that has three
# layers. Each layer will have a convolutional 2d filter that will filter the
# input images (that consist of three layers, namely RGB) and output the probability
# that the target image is classified as belonging to the same class as the training
# data (namely the input file of faces). We then sequentially pass the output of the
# convolutional # into a rectified linear unit (relu) activation layer which will
# increases the non-linear properties of the model to enable the model to recognise
# non-linear functions (i.e. more complex functions than linear regression). Finally
# the feature map of the relu activation layer is passed (again sequentially) to the
# pooling function so that the
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
model.save('cnn.h5')

# Alternatively, you may save only the architecture of the model as a JSON
# string.
#JSONString = model.to_json()
