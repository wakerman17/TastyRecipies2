<h3>Comments:</h3>
<div id="new-comment">
    <div  data-bind="if: username !== ''">
        <textarea data-bind="value: commentText"></textarea><br>
        <button class="button" data-bind="click: sendComment">
            Comment
        </button>
        <br>
        <strong data-bind="text: commentError"></strong>
        <p data-bind="text: commentMessage"></p>
        <div class="bowlG" data-bind="visible: submitLoading">
            <div class="bowl_ringG">
                <div class="ball_holderG">
                    <div class="ballG">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <strong data-bind="ifnot: username !== ''">Log in to write a comment.</strong>
</div>    

<div id="all-comments">
    <div class="bowlG" data-bind="visible: refreashLoading">
        <div class="bowl_ringG">
            <div class="ball_holderG">
                <div class="ballG">
                </div>
            </div>
        </div>
    </div>
    <p data-bind="text: commentsMessage"></p><br>
    <input type="hidden" class="recipe" value="<?php echo $recipe?>">
    <input type="hidden" id="username" value="<?php echo $_SESSION["username"];?>">
    <button class="button" data-bind="click: readComments">
        Update comments
    </button>
    <br><br>
        <!-- ko foreach: {data: comments, as: 'comment'} -->
            <p class="commentinfo">
                Username: <span data-bind="text: comment.Username"></span>
            </p>
            <p class="commentinfo">
                Comment: <span data-bind="text: comment.Comment"></span>
            </p>
            <!-- ko if: comment.iWroteThisComment -->
                <button class="button" data-bind="click: $parent.deleteComment">
                    Delete
                </button>
            <!-- /ko -->
            <br><br>
        <!-- /ko -->
</div>
