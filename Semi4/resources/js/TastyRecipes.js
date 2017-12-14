$(document).ready(function () {
    
    /**
     * Behaves on a function that should be added.
     * @param String recipe The recipe page the client is using
     * @param String currentUsername The username the logged in client has
     */
    function CommentToAdd(recipe, currentUsername) {
        var self = this;
        self.username = currentUsername;
        self.commentText = ko.observable("");
        self.commentMessage = ko.observable("");
        self.commentError = ko.observable("");
        self.submitLoading = ko.observable(false);
        self.sendComment = function () {
            if (self.commentText() !== "") {
                $.ajax({
                    type: "POST",
                    url: "submitComment.php",
                    data: "commentText=" + ko.toJS(self.commentText) + "&recipe=" + ko.toJS(recipe),
                    beforeSend: function(){
                        self.submitLoading(true);
                    },
                     complete: function(){
                        self.submitLoading(false);
                    },
                    success: function (data) {
                        if (data === "Thanks for your comment, press the button below to see it.") {
                            self.commentMessage (data);
                            setTimeout(function(){ self.commentMessage (""); }, 4000);
                        } else {
                            self.commentError (data);
                            setTimeout(function(){ self.commentError (""); }, 4000);
                        }
                    }
                });
                self.commentText("");
            }
            else {
                self.commentError ("Please write something!");
                setTimeout(function(){ self.commentError (""); }, 4000);
            }
        };
    }
    
    /**
     * Function with anonymous functions about the comments already added
     * @param CommentToAdd commentToAdd The comment previously added
     * @param String recipe The recipe page the client is using
     */
    function Comments(commentToAdd, recipe) {
        var self = this;
        self.commentsMessage = ko.observable("");
        self.refreashLoading = ko.observable(false);
        self.comments = ko.observableArray();
        var firstTimeInside = true; 
        self.newestTimesubmitted = 0;
        self.commentToAdd = commentToAdd;
        var comment;
        self.readComments = function () {
            $.ajax({
                type: "GET",
                url: "readComment.php",
                dataType: 'json',
                data: "recipe=" + ko.toJS(recipe) + "&newestTimesubmitted=" + ko.toJS(self.newestTimesubmitted),
                beforeSend: function(){
                    self.refreashLoading(true);
                },
                complete: function(){
                    self.refreashLoading(false);
                },
                success: function(jsonComments) {
                    var i;
                    for (i = jsonComments.length - 1; i >= 0; i--) {
                        //alert(jsonComments.length - 1);
                        comment = jsonComments[i];
                        if (comment.TimeSubmitted > self.newestTimesubmitted) {
                            self.newestTimesubmitted = comment.TimeSubmitted;
                        }
                        comment.Username = removeQuotes(comment.Username);
                        comment.Comment = removeQuotes(comment.Comment);
                        comment.iWroteThisComment = (comment.Username === self.commentToAdd.username);
                        self.comments.push(comment);
                    }
                    if (jsonComments.length === 0 && firstTimeInside !== true) {
                        self.commentsMessage ("No new messages!");
                        setTimeout(function(){ self.commentsMessage (""); }, 4000);
                    } else {
                        firstTimeInside = false;
                    }
                }
            });
        };
        
        self.deleteComment = function (comment) {
            self.comments.remove(comment);
            $.post("deleteComment.php", "submittedTime=" + ko.toJS(comment.TimeSubmitted) + "&recipe=" + ko.toJS(recipe));
        };
        self.readComments();
    }
    
    /**
     * Removes double quotes from the specified string, for json result.
     * 
     * @param {String} string The string from which to remove quotes.
     * @returns {String} 'string', without double quotes.
     */
    function removeQuotes(string) {
        return string.replace(/\"/g, "");
    }
    
    var recipe = $("#recipe").val();
    var currentUsername = $("#username").val();
    // Activates knockout.js
    var commentToAdd = new CommentToAdd(recipe, currentUsername);
    ko.applyBindings(new Comments(commentToAdd, recipe), document.getElementById("all-comments"));
    ko.applyBindings(commentToAdd, document.getElementById("new-comment"));
});
