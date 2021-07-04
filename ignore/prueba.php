<!DOCTYPE">
<HTML>

<HEAD>
    <TITLE>13</TITLE>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</HEAD>

<BODY>
    <form action="form1.php" method="post">
        <input type="submit" name="submit" value="enviar">





        <ul class="nav justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Puntos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                aria-controls="profile" aria-selected="false">Tarjetas</a>
            </li>
        </ul>

        


        <section class="tab-content" id="myTabContent">
            <section class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br />
                <label for="input1"> INPUT 1
                    <input type="text" id="input1" name="i1" value=" input1" />
                </label>
            </section>
            
            <article class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <br />
                <label for="input2"> INPUT 2
                    <input type="text" id="input2" name="i2" value=" input2" />
                </label>
            </article>
        </section>
    </form>
</BODY>

</HTML>