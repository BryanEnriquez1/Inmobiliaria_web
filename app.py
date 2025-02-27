from flask import Flask, render_template, request

app = Flask(__name__, template_folder='VISTAS')

@app.route('/')
def home():
    return render_template('inmueble_info.html')  # Cambiado a 'test.html'

if __name__ == '__main__':
    app.run(debug=True)
