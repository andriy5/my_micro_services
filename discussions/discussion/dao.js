var mongoose = require('mongoose');
var discussionsSchema = require('./model');

discussionsSchema.statics = {
    create : function(data, cb) {
      var discussion = new this(data);
      discussion.save(cb);
    },

    get: function(query, cb) {
        this.find(query, cb);
    },

    getByName: function(query, cb) {
        this.find(query, cb);
    },

    update: function(query, updateData, cb) {
        this.findOneAndUpdate(query, {$set: updateData},{new: true}, cb);
    },

    delete: function(query, cb) {
        this.findOneAndDelete(query,cb);
    }
}

var discussionsModel = mongoose.model('Discussions', discussionsSchema);
module.exports = discussionsModel;