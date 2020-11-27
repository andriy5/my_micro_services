var Discussions = require('./dao');

exports.createDiscussion = function (req, res, next) {
    var discussion = {
        id_users: req.body.id_users.split(","),
        id_messages: req.body.id_messages?.split(",")
    };

    Discussions.create(discussion, function(err, discussion) {
        if(err) {
            res.json({
                error : err
            })
        }
        res.json({
            message : "Discussion created successfully",
            discussion_id : discussion._id
        })
    })
}

exports.getDiscussions = function(req, res, next) {
    Discussions.get({}, function(err, discussions) {
        if(err) {
            res.json({
                error: err
            })
        }
        res.json({
            discussions: discussions
        })
    })
}

exports.getDiscussion = function(req, res, next) {
    Discussions.get({_id: req.params.id}, function(err, discussions) {
        if(err) {
            res.json({
                error: err
            })
        }
        res.json({
            discussions: discussions
        })
    })
}

exports.updateDiscussion = function(req, res, next) {
    var discussion = {
      id_users: req.body.id_users.split(","),
      id_messages: req.body.id_messages.split(",")
    };

    Discussions.update({_id: req.params.id}, discussion, function(err, discussion) {
        if(err) {
            res.json({
                error : err
            })
        }
        res.json({
            message : "Discussion updated successfully",
            discussion: discussion
        })
    })
}

exports.removeDiscussion = function(req, res, next) {
    Discussions.delete({_id: req.params.id}, function(err, discussion) {
        if(err) {
            res.json({
                error : err
            })
        }
        res.json({
            message : "Discussion deleted successfully"
        })
    })
}