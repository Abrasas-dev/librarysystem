    <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>    
    <!--<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.js"></script>-->


    <script type="text/javascript">
        $(document).ready(function(){
        $('#mytable').DataTable({
            'ordering': false,
        });
        $('#mytable1').DataTable({
            'ordering': false,
        });
        });
    </script>

     <script type="text/javascript">
        $( document ).ready(function() {

            
            // // $("#navlinks_l a[href|='" + active + "']").parent().addClass("active");

            
            var active = window.location.pathname;
            // alert(active);
            if(active == '/library/home.php'){
                $("#n1").css("background-color", "rgb(53, 57, 64)");
            }else if(active == '/library/index.php'){
                $("#n2").css("background-color", "rgb(53, 57, 64)");
            }else{
                $("#n3").css("background-color", "rgb(53, 57, 64)");
            }
            


            // $("#navlinks_l a").on("click", function(){
            //     alert('hoho');
            //     $("#navlinks_l").find(".active").removeClass("active");
            //     $(this).parent().addClass("active");
            // });

            //   $.each($('#navlinks_l').find('li'), function() {
            //         $(this).toggleClass('active', 
            //             window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
            //     }); 

        });
    </script>

    </body>
</html>