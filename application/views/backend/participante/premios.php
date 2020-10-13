<h1 class="text-center" style="color: #0050B0">PREMIOS</h1>
<hr>
<div class="row">
    <div class="col-md-4 text-center" style="padding-top: 20px;">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_2-2.png?w=325&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/premios-playstation4.jpg?w=324&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_5-1.png?w=315&ssl=1" alt="">
        <button class="btn btn-lg btn-blue" style="font-size:20px; margin: 10px 0px; width:250px" data-toggle="modal" data-target="#myModal1">VER RANKIN <i class="fa fa-trophy"></i></button>
    </div>
    <div class="col-md-4 text-center" style="padding-top: 10px; background-color: #75BEE9;">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i1.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_3-1.png?w=326&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/premios-netflix_spotify.jpg?w=324&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_6-1.png?fit=274%2C55&ssl=1" alt="">
        <a href="#" class="btn btn-lg btn-blue" style="font-size:20px; margin: 30px 0px; width:250px">REDIMIR PREMIOS <i class="fa fa-tags"></i></a href="#">
    </div>
    <div class="col-md-4 text-center" style="padding-top: 20px;">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i2.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_4-1.png?w=325&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/Premios-tipo-C.jpg?w=340&ssl=1" alt="">
        <img class="img-responsive center-block" style="margin-bottom: 10px;" src="https://i0.wp.com/elrecreoesdetodos.com/wp-content/uploads/2020/10/texto_7.png?w=304&ssl=1" alt="">
        <a href="#" class="btn btn-lg btn-blue" style="font-size:20px; margin: 10px 0px; width:250px">REDIMIR PREMIOS <i class="fa fa-tags"></i></a href="#">
    </div>
</div>

<!-- Modal1 -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div id="modal" style="display: none;" class="modal-example-content">
<div class="modal-example-header">
<button type="button" class="close" onclick="$.fn.custombox('close');">×</button>
<h4>jQuery Custombox</h4>
</div>
<div class="modal-example-body">
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>
</div>


<script>
    $(function () {
        $('#modal').on('click', function () {
            $.fn.custombox( this );
            return false;
        });
    });
</script>