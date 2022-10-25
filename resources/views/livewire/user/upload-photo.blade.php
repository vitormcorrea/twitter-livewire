<div>
    <h2>Atualizar foto de perfil:</h2>

    <form action="" method="post" wire:submit.prevent="storagePhoto">

        @error('photo') {{ $message }} @enderror

        <input type="file" wire:model="photo">
        <br>
        <button type="submit">Enviar</button>
    </form>
</div>