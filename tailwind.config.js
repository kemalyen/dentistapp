import preset from './vendor/filament/support/tailwind.config.preset'
 
export default {
    presets: [preset,
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"), 
    ],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './app/Livewire/**/*Table.php',
        './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
        './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php'
    ],
}