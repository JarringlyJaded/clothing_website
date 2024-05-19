<?php include('partials-frontend/collection.php'); ?>

    <div class="container3">
    <div style="text-align:center">
        <h2>Contact Us</h2>
        <p>Please leave us a comment about something you like or about what we can do better!</p>
    </div>
    <div class="row">
        <div class="column">
        <img src="images/newlogo.jpg" style="width:100%">
        </div>
        <div class="column">
        <form>
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            </select>
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
            <input type="submit" value="Submit">
        </form>
        </div>
    </div>
    </div>

<?php include('partials-frontend/footer.php'); ?>