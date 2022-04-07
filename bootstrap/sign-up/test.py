
from lib2to3.pytree import LeafPattern
from statistics import mode
import pandas as pd
from sklearn.preprocessing import LabelEncoder
from sklearn import tree
from sklearn.tree import DecisionTreeClassifier
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score, classification_report, confusion_matrix
from flask import Flask,render_template,request,redirect

import pickle



df = pd.read_csv("C:/Users/HP/Desktop/vacdata.csv")
df.head()
model = df.drop('Name', axis='columns')

target = df['Name']
print(target)

le_age = LabelEncoder()
le_gender = LabelEncoder()
le_heart_disease = LabelEncoder()
le_blood_pressure = LabelEncoder()
le_diabetes = LabelEncoder()
le_stroke = LabelEncoder()
le_ezema = LabelEncoder()
le_cancer = LabelEncoder()

model['age_n'] = le_age.fit_transform(model['age'])
model['gender_n'] = le_age.fit_transform(model['gender'])
model['heart_disease_n'] = le_age.fit_transform(model['heart_disease'])
model['blood_pressure_n'] = le_age.fit_transform(model['blood_pressure'])
model['diabetes_n'] = le_age.fit_transform(model['diabetes'])
model['stroke_n'] = le_age.fit_transform(model['stroke'])
model['ezema_n'] = le_age.fit_transform(model['ezema'])
model['cancer_n'] = le_age.fit_transform(model['cancer'])

print(model.head())

model_n = model.drop(['age', 'gender', 'heart_disease', 'blood_pressure', 'diabetes', 'stroke', 'ezema', 'cancer'], axis='columns')
print(model_n)

input = tree.DecisionTreeClassifier()
print(input.fit(model_n, target))

input.score(model_n,target)



print(input.predict([[22,2,1,1,0,0,0,0]]))