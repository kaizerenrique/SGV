<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="file">     
        @error('file') <span class="error">{{ $message }}</span> 
        @enderror      
        <button type="submit">Save file</button>    
    </form>
</div>
