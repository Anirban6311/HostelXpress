const mongoose = require("mongoose");

const loginSchema = new mongoose.Schema({
    uid: String,
    password: String,
}, {
    collection: "login_db" // Specify the collection name
});

const Login = mongoose.model("Login", loginSchema);

module.exports = Login;
