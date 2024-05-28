<form action="#" method="POST">
                <div class="row">
                    <label for="formFirstName">First name</label><br>
                    <input type="text"
                        name="formFirstName"
                        id="formFirstName"
                        value="<?php echo $firstName; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formSecondName">Second name</label><br>
                    <input type="text" 
                        name="formSecondName"
                        id="formSecondName" 
                        value="<?php echo $secondName; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formAge">Age</label><br>
                    <input type="number" 
                        name="formAge" 
                        id="formtAge" 
                        min="10" 
                        value="<?php echo $age; ?>"
                        required>
                </div>
                <div class="row">
                    <label for="formCollage">Collage</label><br>
                    <input type="text" 
                    name="formCollage" 
                    id="formCollage"
                    value="<?php echo $collage; ?>" 
                    required>
                </div>
                <div class="row">
                    <label for="formLife">Life</label><br>
                    <textarea name="formLife" id="formLife" required><?php echo $life; ?></textarea>
                </div>
                <div class="row">
                    <input type="submit" value="Save student" name="saveStudent">
                </div>

</form>