from flask import Flask, request, jsonify, render_template # type: ignore

app = Flask(__name__)

# Example in-memory database (replace this with actual database later)
features = []

@app.route('/')
def home():
    return render_template('admin.html')  # Render the admin page

@app.route('/api/features', methods=['GET', 'POST'])
def manage_features():
    if request.method == 'GET':
        return jsonify(features)
    elif request.method == 'POST':
        new_feature = request.get_json()
        new_feature['id'] = len(features) + 1  # Simple auto-increment for demo
        features.append(new_feature)
        return jsonify(new_feature), 201

@app.route('/api/features/<int:feature_id>', methods=['DELETE'])
def delete_feature(feature_id):
    global features
    features = [feature for feature in features if feature['id'] != feature_id]
    return '', 204

@app.route('/api/features/<int:feature_id>', methods=['PUT'])
def update_feature(feature_id):
    updated_data = request.get_json()
    for feature in features:
        if feature['id'] == feature_id:
            feature['name'] = updated_data['name']
            feature['description'] = updated_data['description']
            return jsonify(feature)
    return '', 404

if __name__ == '__main__':
    app.run(debug=True)
