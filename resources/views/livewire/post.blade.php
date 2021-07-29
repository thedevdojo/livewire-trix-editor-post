<div>
    <div>
        <label for="title" style="display:block">Title</label>
        <input type="text" style="border:1px solid #ccc" name="title" wire:model.lazy="title">
    </div>

    <div>
        <label for="body">Body</label>
        <livewire:trix :value="$body">
    </div>

    <div>
        <button wire:click="save">Save</button>
    </div>
</div>
