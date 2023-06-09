<!-- modal modification de profil -->

<?php
// je require tout aussi ici car modal-profil n'est pas dans l'arboressence des pages

// require controler
require_once('./mvc/controler/Controler.php');
require_once('./mvc/controler/User.php');
require_once('./mvc/controler/Groupe.php');
require_once('./mvc/controler/Games.php');

// require model
require_once('./mvc/model/User.php');
require_once('./mvc/model/Games.php');
require_once('./mvc/model/Groupe.php');
require_once('./mvc/model/Model.php');

use \mvc\controler\controler\Controler;

$controler = new Controler();
if (isset($_SESSION['id'])) {
   $user = $controler->user->userModel->findById($_SESSION['id'], 'idUser');
}

?>

<!-- Modal pour update un user -->
<input type="checkbox" id="modal-profil" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box bg-secondary max-w-3xl">
      <h3 class='title mb-4'>Modifier votre profil</h3>
      <label for="modal-profil" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="../handler_formulaire/handler.php" method="post">
         <div>
            <div>
               <label for="pp" class='block mb-2 font-leger'>Pseudo</label>
               <input type="text" name='pseudo' class="inputForm bg-primary" value="<?= $user['userPseudo'] ?>" />
            </div>
            <div class='mt-4'>
               <textarea class="textarea w-full bg-primary resize-none h-44" placeholder="Bio" name='bio'><?= $user['userBio'] ?></textarea>
            </div>
            <div class="mt-4">
               <button class='btn button' type='submit' name='btn-edit-profile'>Modifier</button>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- Modal pour update un user -->

<!-- Modal pour créer un groupe -->
<input type="checkbox" id="modal-create-groupe" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-create-groupe" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">Créer un nouveau groupe</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <input class='input input-bordered input-info w-full max-w-xs' type="text" placeholder="Nom de votre groupe" name='nomGroupe'>

            <textarea class='textarea textarea-accent' placeholder='Description de votre groupe' name='descGroupe'></textarea>

            <select class="select select-bordered w-full max-w-xs bg-primary" name='privacy'>
               <option value='publique'>Publique</option>
               <option value='prive'>Privé</option>
            </select>

            <label>Photo de profil du groupe</label>
            <input type="file" name="pp" class="file-input w-full max-w-xs" />

            <label>Photo de bannière du groupe</label>
            <input type="file" class="file-input w-full max-w-xs" name="banner" />

            <button type='submit' name='btn-add-groupe' class='btn'>Créer</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal pour créer un groupe -->

<!-- Modal créer un post -->
<input type="checkbox" id="modal-create-post" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-create-post" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">Publier un post</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <textarea class='textarea block w-full h-44 resize-none' placeholder='Que voulez-vous partager ?' name='content'></textarea>

            <button type='submit' name='btn-add-post' class='btn btn-accent'>Créer</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal créer un post -->


<!-- Modal modifier un post -->

<!-- Si on modifie un post alors on doit récupéré le content et l'id du post -->
<?php
$test = "c pas bon";
if (isset($_GET['updatePost'])) {
   $test = "c bon";
}
?>
<!-- Si on modifie un post alors on doit récupéré le content et l'id du post -->


<input type="checkbox" id="modal-edit-post" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-edit-post" id="closeModalEditPost" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold"><?= $test ?></h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <input class='input input-bordered border-accent w-full placeholder:text-md' type="text" placeholder="Intitulé du sujet" name='nomSujet'>

            <textarea class='textarea textarea-accent text-md textarea-xl' placeholder='Corp du sujet' name='descSujet'></textarea>

            <button type='submit' name='btn-add-sujet' class='btn'>Publier</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal modifier un post -->
