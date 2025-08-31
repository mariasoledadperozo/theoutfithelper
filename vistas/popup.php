
        <article class="d-none" id="overlay-pop-up">
        <article id="pop-up">
        <i class="fa-solid fa-x" onclick="popUp()"></i>
        <form action="/controlador/pieceController.php" method="post" enctype="multipart/form-data">
            <section id="pop-up-main-title">
                <h3>Add new piece</h3>
            </section>
            <section class="elements-form">
                                <label for="picture">Picture*:</label>
                                <input type="file" name="picture" require>
            </section>
            <section class="elements-form">
                                <label for="type">Type*:</label>
                                <select name="type" required>
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="shoes">Shoes</option>
                                    <option value="accesory">Accesory</option>
                                </select>
            </section>
             <section class="elements-form">
                                <label for="color">Main color:</label>
                                <select name="color" required>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="red">Red</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="pink">Pink</option>
                                    <option value="purple">Purple</option>
                                    <option value="brown">Brown</option>
                                    <option value="gray">Gray</option>
                                </select>
            </section>
            <section id="button-form">
                                <button class="pop-up-main-button" name="upload-piece">Send</button>
                                <button class="pop-up-second-button">Back</button>
            </section>
        </form>
    </article>
    </article>