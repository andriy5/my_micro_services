var mongoose = require('mongoose');
var Schema = mongoose.Schema;
var discussionsSchema = new Schema({
    id_users : {
        type: [Number],
        required : true
    },
    id_messages : [Number]
}, {
    timestamps: true
});

module.exports = discussionsSchema;