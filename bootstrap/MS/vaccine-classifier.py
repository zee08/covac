
import pandas as pd
from sklearn.preprocessing import LabelEncoder
from sklearn import tree
from sklearn.tree import DecisionTreeClassifier
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.externals import joblib
import pickle
from sklearn.metrics import accuracy_score
df = pd.read_csv("C:/Users/HP/Desktop/vacdata.csv")
df.head()
X= df.drop('Name', axis='columns')
y = df['Name']
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.1)


model = DecisionTreeClassifier()
model.fit(X_train, y_train)
with open('model_pickle.pkl', 'wb') as f:
  pickle.dump(model,f)
predictions = model.predict(X_test)
with open('model_pickle.pkl', 'rb') as f:
   mp = pickle.load(f)
prediction = mp.predict([[22, 2, 1, 1, 0, 0, 0, 0]])
print(prediction)

#print( accuracy_score(y_test, predictions))