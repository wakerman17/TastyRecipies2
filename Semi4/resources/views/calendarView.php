<!doctype html>
<html lang="en">
    <head>
        <title>Tasty Recipes Calendar</title>
        <?php
	include TASTY_RECIPES_FRAGMENTS . 'css.php';
	?>	
        <link 	rel = "stylesheet"
                type = "text/css"
                href = "<?php echo TASTY_RECIPES_CSS ?>calendar.css"/>
    </head>
    <body>
        <header>
            <?php
            $head = 'Calender';
            include TASTY_RECIPES_FRAGMENTS . 'header.php';
            ?>
        </header>
        <nav>
            <ul>
                <li><a class="navLink" href="home.php">Home</a></li>
                <li><a class="navLink" href="register.php">Register</a></li>
                <li class="navLink" id="active">Calendar</li>
                <li><a class="navLink" href="meatballs.php">Meatballs</a></li>
                <li><a class="navLink" href="pancakes.php">Pancakes</a></li>
            </ul>
        </nav>
        <main>
            <p>
                Press the image to see the recipe.
            </p>
            <h3 id="month">November</h3>
            <div class="grid-containeroutline">
                <div class="row">
                    <div class="col-row1"><strong>Mon</strong></div>
                    <div class="col-row1"><strong>Tue</strong></div>
                    <div class="col-row1"><strong>Wen</strong></div>
                    <div class="col-row1"><strong>Thu</strong></div>
                    <div class="col-row1"><strong>Fri</strong></div>
                    <div class="col-row1"><strong>Sat</strong></div>
                    <div class="col-row1"><strong>Sun</strong></div>
                </div> 
                <div class="row">
                    <div class="col-row2 anotherMonth"><p>30</p></div> 
                    <div class="col-row2 anotherMonth"><p>31</p></div> 
                    <div class="col-row2">
                        <p>
                            <a href="meatballs.html">
                                <img class="imgCal" src="resources/meta/meatballs.jpg" alt="Meatballs">
                            </a>
                            1
                        </p>
                    </div>
                    <div class="col-row2"><p>2</p></div>
                    <div class="col-row2"><p>3</p></div>
                    <div class="col-row2"><p>4</p></div>
                    <div class="col-row2"><p>5</p></div>
                </div> 
                <div class="row">
                    <div class="col-row3"><p>6</p></div>
                    <div class="col-row3"><p>7</p></div>
                    <div class="col-row3"><p>8</p></div>
                    <div class="col-row3">
                        <p>
                            <a href="pancakes.html">
                                <img class="imgCal" src="resources/meta/pancakes.jpg" alt="Pancakes">
                            </a>
                            9
                        </p>
                    </div>
                    <div class="col-row3"><p>10</p></div>
                    <div class="col-row3"><p>11</p></div>
                    <div class="col-row3"><p>12</p></div>
                </div>
                <div class="row">
                    <div class="col-row4"><p>13</p></div>
                    <div class="col-row4"><p>14</p></div>
                    <div class="col-row4"><p>15</p></div>
                    <div class="col-row4"><p>16</p></div>
                    <div class="col-row4"><p>17</p></div>
                    <div class="col-row4"><p>18</p></div>
                    <div class="col-row4"><p>19</p></div>
                </div>
                <div class="row">
                    <div class="col-row5"><p>20</p></div>
                    <div class="col-row5"><p>21</p></div>
                    <div class="col-row5"><p>22</p></div>
                    <div class="col-row5"><p>23</p></div>
                    <div class="col-row5"><p>24</p></div>
                    <div class="col-row5"><p>25</p></div>
                    <div class="col-row5"><p>26</p></div>
                </div>
                <div class="row">
                    <div class="col-row6"><p>27</p></div>
                    <div class="col-row6"><p>28</p></div>
                    <div class="col-row6"><p>29</p></div>
                    <div class="col-row6"><p>30</p></div>
                    <div class="col-row6 anotherMonth"><p>1</p></div>
                    <div class="col-row6 anotherMonth"><p>2</p></div>
                    <div class="col-row6 anotherMonth"><p>3</p></div>
                </div>
            </div> 
        </main>
        <footer>
            <?php include TASTY_RECIPES_FRAGMENTS . 'footer.php'; ?>
        </footer>
    </body>
</html>