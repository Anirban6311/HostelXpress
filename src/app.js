const express = require("express");
const app = express();

const path = require('path');
const db = require("./db/conn");

const temp_path = path.join(__dirname, "../templates/views");

app.set("view engine", "hbs");
app.set("views", temp_path);

// Middleware to parse the request body
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

let port = 3000;


const Login = require("./models/Login");

app.get("/", (req, res) => {
    res.render("student_login");
});

app.post("/student_login", async (req, res) => {
    try {
        const uid = req.body.uid;
        const password = req.body.password;
        console.log(`${uid} and ${password}`);
        // Here you can add your code to validate the login credentials
        const user = await Login.findOne({ uid, password });

        if (user) {
            // Successful login
            console.log("Login successful:", user);
            res.send("Login successful");
        } else {
            // Invalid credentials
            console.log("Invalid credentials");
            res.send("Invalid credentials");
        }
        // Respond to the client indicating success or failure
        // res.send("Login attempted. Check the server console for details.");
    } catch (error) {
        res.send(error);
    }
});

app.listen(port, () => {
    console.log(`Listening to port ${port}`);
});
