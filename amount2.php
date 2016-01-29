<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
    var sum = 0;
    $('.click').click(function() {
        sum = 0;
        $(':checkbox:checked,:radio:checked').each(function(idx, elm) {
        
            sum += parseInt(elm.value, 10);
         $("#s1").val(sum );
        }); 
       // $('#total_potential').html(sum);

        });

    });

    </script>
</head>
<body>
<div>
    <input type="checkbox" value="10" class="click" /> Box1(10)<br/>
    <input type="checkbox" value="11" class="click"/> Box2(10)<br/>
	<input type="radio" name="sex" value="50" class="click" >Box3(10)<br/>
	<input type="radio" name="sex" value="1" class="click">Box4(10)<br/>
 	<input type="checkbox" value="10" class="click"/> Box5(10)<br/>
</div>
<br />
<br />


        <input type="text" name="srini" id="s1">
  
</body>
</html>
