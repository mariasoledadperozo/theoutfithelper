
        <article class="d-none" id="overlay-pop-up">
        <article id="pop-up">
        <i class="fa-solid fa-x" onclick="popUp()"></i>
        <form action="/controlador/pieceController.php" method="post">
            <section id="pop-up-main-title">
                <h3>Add new piece</h3>
            </section>
            <section class="elements-form">
                                <label for="picture">Picture*:</label>
                                <input type="file" name="picture" require>
            </section>
            <section class="elements-form">
                                <label for="picture">Type*:</label>
                                <select name="type" required>
                                    <option value="T">Top</option>
                                    <option value="B">Bottom</option>
                                </select>
            </section>
            <section id="button-form">
                                <button class="pop-up-main-button">Send</button>
                                <button class="pop-up-second-button">Back</button>
            </section>
        </form>
    </article>
    </article>