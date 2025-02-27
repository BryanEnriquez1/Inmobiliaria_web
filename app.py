from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('VISTAS/test.html')

if __name__ == '__main__':
    app.run(debug=True)
