document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    
    // Função para definir o modo escuro
    function setDarkMode(isDark) {
        document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
        document.cookie = `darkMode=${isDark}; path=/; max-age=31536000`; // 1 ano
    }
    
    // Verifica preferência inicial
    const storedDarkMode = document.cookie.match(/darkMode=(true|false)/);
    if (storedDarkMode) {
        setDarkMode(storedDarkMode[1] === 'true');
    } else {
        setDarkMode(prefersDarkScheme.matches);
    }
    
    // Alterna modo escuro ao clicar no botão
    darkModeToggle.addEventListener('click', () => {
        const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
        setDarkMode(!isDark);
    });
    
    // Atualiza modo escuro quando a preferência do sistema mudar
    prefersDarkScheme.addEventListener('change', (e) => {
        setDarkMode(e.matches);
    });
});