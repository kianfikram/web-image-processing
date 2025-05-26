from flask import Flask, request, jsonify
import cv2
import numpy as np
import base64

app = Flask(__name__)

def to_base64(img):
    _, buffer = cv2.imencode('.jpg', img)
    return base64.b64encode(buffer).decode('utf-8')

@app.route('/grayscale', methods=['POST'])
def grayscale():
    file = request.files['gambar']
    npimg = np.frombuffer(file.read(), np.uint8)
    img = cv2.imdecode(npimg, cv2.IMREAD_COLOR)
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    return jsonify({'hasil': to_base64(gray)})

@app.route('/biner', methods=['POST'])
def biner():
    file = request.files['gambar']
    npimg = np.frombuffer(file.read(), np.uint8)
    img = cv2.imdecode(npimg, cv2.IMREAD_GRAYSCALE)
    _, thresh = cv2.threshold(img, 127, 255, cv2.THRESH_BINARY)
    return jsonify({'hasil': to_base64(thresh)})

@app.route('/negatif', methods=['POST'])
def negatif():
    file = request.files['gambar']
    npimg = np.frombuffer(file.read(), np.uint8)
    img = cv2.imdecode(npimg, cv2.IMREAD_COLOR)
    negative = cv2.bitwise_not(img)
    return jsonify({'hasil': to_base64(negative)})

if __name__ == '__main__':
    app.run(debug=True)