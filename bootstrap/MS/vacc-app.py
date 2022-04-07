
from flask import Flask, request, render_template, redirect, url_for
import numpy as np
from sklearn.linear_model import LinearRegression
import pickle

with open('model_pickle.pkl', 'rb') as f:
    model = pickle.load(f)
    
app = Flask(__name__)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        age = request.form['age']
        gender = request.form['gender']
        heart_disease = request.form['heart_disease']
        blood_pressure = request.form['blood_pressure']
        diabetes = request.form['diabetes']
        stroke = request.form['stroke']
        eczema = request.form['ezema']
        cancer = request.form['cancer']

        pred = model.predict(np.array([[age, gender, heart_disease, blood_pressure, diabetes, stroke, eczema, cancer] ]))
        return render_template('index.html', pred = str(pred))
    
    return render_template('index.html')

if __name__ == '__main__':
    app.run()













