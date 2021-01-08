<main id="main"> 
  
  <!--==========================
      ConterDiv Section
    ============================-->
  
  <div class="main-div-sec">
    <div class="full" style="background:#f6f8fa; padding: 30px 0 60px 0; width:100%; float:left;">
      <div class="container">
        <div class="view-box">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Rehire freelancer</li>
            </ol>
          </nav>
          <div class="top-offer">
            <h2> Rehire Freelancer </h2>
            <div class="input-group mb-3">
              <div class="input-group-prepend"> <span class="input-group-text"><img src="<?= base_url().'assets/'?>img/search.png" alt="search"> </span> </div>
              <input type="text" class="form-control" placeholder="Seacrh..... ">
            </div>
            <div class="short-date short-filter"><a href="#TaskFilter" data-toggle="modal" class="Filter-open"><img src="<?= base_url().'assets/'?>img/filter-img.png" alt="img"> Filter</a></div>
          </div>
          
		  {hire_list}
			<div class="anaaDiv">
				<div  class="chackDiv">
					<label class="containerDiv">
					<input type="checkbox">
					<span class="checkmark"></span>
					</label>
				</div>
				<div class="anaaDiv-top"> <span> <img src="img/pro-box1.jpg" alt="img"> </span>
					<div class="round"> </div>
					<div class="caption">
						<h3> {name} </h3>
						<p> {address}, {city}, {state}, {country} </p>
						<small> + 10 Coins </small>
						<em> - 10 Coins </em> 
						<div class="btnDiv2"> <a href="make-an-offer.html" class="view-btn1"> Make offer </a> <a href="direct-hire.html" class="view-btn2"> Rehire </a> </div>
					</div>
					<div class="caption-bottom">
						<div class="borderdiv-part">
							<button class="accordion"> Contracts </button>
							<div class="panel">
								<div class="big-text">
									<div class="big-text-part"> <big> Doveloper for IOS App </big> <span> Active </span> </div>
									<div class="big-text-part"> <big> Need a worrpress Developer </big> <span> Closed on jan2, 2010 </span> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  {/hire_list}
        </div>
        <div class="pag"> 
          <!--{link}
		  <ul class="pagination" style="margin-top:20px;">
            <li class="previous"><a href="#">Previous</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li class="next"><a href="#">Next</a></li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>
</main>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script> 