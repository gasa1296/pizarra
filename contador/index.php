  <?php
include"../header.php";

 ?>

<!-- start: Content -->
<div id="content">
  <div class="panel box-shadow-none content-header">
    <div class="panel-body">
      <div class="col-md-12">
        <h3 class="animated fadeInLeft">Contador</h3>
        <p class="animated fadeInDown">
          Principal <span class="fa-angle-right fa"></span> Contador
        </p>
      </div>
    </div>
  </div>

  <div>
    <div class="col-md-12">
      <div class="col-md-12 panel">
        <div class="col-md-12 panel-heading">
          <h4>Contador</h4>
          <div class="col-md-11">
          </div>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
          <form class="cmxform" id="conceptos" method="post" action="">
            <!-- botones de subir -->
            <div class="col-md-3">
              <br>
              <br>
              <br>
              <input type="button" class="submit btn btn-success center-block" id='bola'  value="+1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <br>
              <br>
              <br>
              <input type="button" class="submit btn btn-success center-block" id='strike'  value="+1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <br>
              <br>
              <br>
              <input type="button" class="submit btn btn-success center-block" id='out' value="+1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <br>
              <br>
              <br>
              <input type="button" class="submit btn btn-success center-block" id='Foul' value="+1" onclick="ballup(this);">
            </div>
            <!-- Contador! -->
            <div id="contador">
              <?php
                $sql = "SELECT * FROM `contador` WHERE 1";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                  $Balls=$row['Balls'];
                  $Strike=$row['Strikes'];
                  $Outs=$row['Outs'];
                  $Fouls=$row['Fouls'];
                  $V_pichadas=$row['V_pichadas'];
                  $Strikes_Counter=$row['Strikes_Counter'];
                }
              ?>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                  	<h2 class="center-block" style="text-align: center;">Balls</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Balls" value='<?php echo $Balls;?>' name="Balls" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                  	<h2 class="center-block" style="text-align: center;">Strike</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Strike" value='<?php echo $Strike;?>' name="Strike" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                  	<h2 class="center-block" style="text-align: center;">Outs</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Outs" value='<?php echo $Outs;?>' name="Outs" required readonly>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group " style="margin-top:40px !important;">
                  	<h2 class="center-block" style="text-align: center;">Fouls</h2>
                    <input type="text" class="form-text center-block" style="text-align: center; font-size: large;" id="Fouls" value='<?php echo $Fouls;?>' name="Fouls" required readonly>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group " style="margin-top:40px !important;">
                    <input type="hidden" class="form-text center-block" style="text-align: center;" id="V_pichadas" value='<?php echo $V_pichadas;?>' name="V_pichadas" required readonly>
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group " style="margin-top:40px !important;">
                    <input type="hidden" class="form-text center-block" style="text-align: center;" id="Strikes_Counter" value='<?php echo $Strikes_Counter;?>' name="Strikes_Counter" required readonly>
                  </div>
              </div>
            </div>
            <!-- Botones de bajar -->
            <div class="col-md-3">
              <input type="button" class="submit btn btn-danger center-block" id='bolam'  value="-1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <input type="button" class="submit btn btn-danger center-block" id='strikem' value="-1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <input type="button" class="submit btn btn-danger center-block" id='outm' value="-1" onclick="ballup(this);">
            </div>
            <div class="col-md-3">
              <input type="button" class="submit btn btn-danger center-block" id='Foulm' value="-1" onclick="ballup(this);">
            </div>

            <div class="col-md-12">
              <br>
              <br>
              <br>
              <input type="button" class="submit btn btn-block btn-info center-block" id='reset' value="RESET" onclick="ballup(this);">
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php
  include"../footer.php";
?>


<script>

function ballup(obj){
    var Balls=document.getElementById('Balls').value;
    var Strike=document.getElementById('Strike').value;
    var Outs=document.getElementById('Outs').value;
    var Fouls=document.getElementById('Fouls').value;
    var V_pichadas=document.getElementById('V_pichadas').value;
    var Strikes_Counter=document.getElementById('Strikes_Counter').value;


    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("contador").innerHTML = this.responseText;
        }
    };

   
    xmlhttp.open("GET", "ballup.php" + "?Balls=" + Balls+ "&tipo=" + obj.getAttribute("id")+ "&Strike=" + Strike+ "&Outs=" + Outs+ "&Fouls=" +Fouls+ "&V_pichadas=" + V_pichadas+ "&Strikes_Counter=" + Strikes_Counter, false);
    xmlhttp.send();

    setTimeout("location.reload(true);",0);
}


</script>
