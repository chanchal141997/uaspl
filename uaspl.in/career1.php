<style>
    body {
        padding: 2rem 0;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php include 'header.php'; ?>
<section class="page-title" style="background-image:url(images/background/contact1.jpeg);">
    <div class="auto-container">
        <h1>Career</h1>
    </div>
</section>

<br><br>
<div class="container">
    <div class="row mx-1 justify-content-center">
        <div class="col-md-8 col-lg-7 px-lg-2 col-xl-4 px-xl-0">
	
            <form method="POST" class="w-100 rounded p-4 border bg-white" action="https://formspree.io/f/mjvqvapb" enctype="multipart/form-data">
                <label class="d-block mb-4">
                    <span class="d-block mb-2">Your name</span>
                    <input required name="name" type="text" class="form-control"  />
                </label>

                <label class="d-block mb-4">
                    <span class="d-block mb-2">Email address</span>
                    <input required name="email" type="email" class="form-control"  />
                </label>

                
                <label class="d-block mb-4">
                    <span class="d-block mb-2">Tell us more about yourself</span>
                    <textarea name="message" class="form-control" rows="3" placeholder="What motivates you?"></textarea>
                </label>

              <!--  <div class="mb-4">
                    <label class="d-block mb-2">Your CV</label>
                    <div class="form-control h-auto">
                        <input required name="cv" type="file" class="form-control-file" />
                    </div>
                </div> -->

                <div class="mb-4">
                    <div>
                        <label class="custom-control custom-radio">
                            <input name="remote" value="yes" type="radio" class="custom-control-input" checked />
                            <span class="d-inline-block mt-1 custom-control-label">You'd like to work remotely</span>
                        </label>
                    </div>

                    <div>
                        <label class="custom-control custom-radio">
                            <input name="remote" value="no" type="radio" class="custom-control-input" />
                            <span class="d-inline-block mt-1 custom-control-label">You'd prefer to work onsite</span>
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary px-3">Apply</button>
                </div>

                
            </form>
        </div>
    </div>
</div>

<br><br>

<?php include 'footer.php'; ?>