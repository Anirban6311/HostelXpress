const mongoose = require("mongoose");

mongoose.connect("mongodb://localhost:27017/student", {
  useNewUrlParser: true,
  useUnifiedTopology: true,

}).then(() => {
  console.log(`Connected to the database successfully`);
}).catch((error) => {
  console.error(`Error connecting to the database: ${error}`);
});

module.exports = mongoose;
