var Discussions = require('./controller');

module.exports = function(router) {
    router.post('/discussion', Discussions.createDiscussion);
    router.get('/discussions', Discussions.getDiscussions);
    router.get('/discussion/:id', Discussions.getDiscussion);
    router.put('/discussion/:id', Discussions.updateDiscussion);
    router.delete('/discussion/:id', Discussions.removeDiscussion);
}