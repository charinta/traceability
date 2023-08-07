<!-- resources/views/components/label.blade.php -->
@props(['for', 'value'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'font-bold']) }}>
    {{ $value }}
</label>
