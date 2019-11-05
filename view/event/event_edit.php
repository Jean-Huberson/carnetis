<?php
    require(WEBROOT.'/_header.php');
?>


    <!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="page-title">Ajoutez un évènement</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ajouter un évèment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Our Blog Area Start -->
    <div class="our-blog-area section-padding-100">
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-12">
                    <div class="contact_from_area mb-100 clearfix">
                        <!-- Contact Heading -->
                        <div class="contact-heading">
                            <h4>Enregistrement d'évènement</h4><br/>
                        </div>
                        <div class="contact_form">
                            <form action=<?php echo BASE_URL.DS.'event'.DS.'event_edit';?> method="POST" enctype="multipart/form-data" id="form">
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="category" id="category" placeholder="Catégorie" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="title" id="title" placeholder="Titre" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="date" class="form-control mb-30" name="beginDate" id="beginDate" title="Date de début" placeholder="Date début" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="date" class="form-control mb-30" name="endDate" id="endDate" title="Date de fin" placeholder="Date fin" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="time" class="form-control mb-30" name="beginTime" id="beginTime" title="Heure de début" placeholder="Heure début" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="time" title="Heure de fin" class="form-control mb-30" name="endTime" id="endTime" placeholder="Heure fin" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="country" id="country" placeholder="Pays" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="city" id="city" placeholder="Ville / Commune" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="region" id="region" placeholder="Région" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="section" id="section" placeholder="Quartier" required>
                                            </div>
                                        </div>
                                        
                                        <!-- Form Group -->
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="price" id="price" placeholder="Prix">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control mb-30" name="structure" id="structure" placeholder="Structure">
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-3 col-lg-4">
                                            <div class="form-group">
                                                <input type="text" name="description" class="form-control mb-30" id="description" cols="30" rows="6" placeholder="Description" required>
                                            </div>
                                        </div>
                                        <!-- Form Group -->
                                        <div class="col-3 col-lg-4">
                                            <div class="form-group">
                                                <?php if(isset($messageFile) && !empty($messageFile)){echo($messageFile);}?>
                                                <input type="file" multiple name="file[]" class="form-control mb-30" id="file" cols="30" rows="6" placeholder="Ajouter des images" required>
                                            </div>
                                        </div>
                                        <div class="col-3 col-lg-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id_sender" class="form-control mb-30" id="id_sender" cols="30" rows="6" value="" >
                                            </div>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" id="submit" class="btn confer-btn">Poster <i class="zmdi zmdi-mail-send"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </div>

            
        </div>
    </div>
    <!-- Our Blog Area End -->
    
<!-- Footer Area Start -->
<?php
include_once(WEBROOT.'/_footer.php');
?>

<!-- Footer Area End -->

</body>

</html>