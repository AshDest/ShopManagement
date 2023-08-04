<div>
    <h1>Bonjour, {{$name}} !</h1>
    <p>Votre âge est de {{$age}} ans.</p>

    <div>
        <!-- Mettez ici tout le contenu HTML que vous souhaitez inclure dans le PDF -->
    </div>

    <button wire:click="generatePdf">Générer le PDF</button>
</div>
