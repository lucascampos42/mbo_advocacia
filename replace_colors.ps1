# Script para substituir cores hardcoded por variáveis CSS
$filePath = "c:\dev\mbo_advocacia\meu-tema\style.css"

# Mapeamento de cores hardcoded para variáveis CSS
$colorMappings = @{
    '#C9A64E' = 'var(--dourado-principal)'
    '#E4C97D' = 'var(--dourado-claro)'
    '#B8956E' = 'var(--dourado-escuro)'
    '#A8856E' = 'var(--dourado-mais-escuro)'
    '#1A1A1A' = 'var(--preto-marmore)'
    '#0F0F0F' = 'var(--preto-mais-escuro)'
    '#2E2E2E' = 'var(--cinza-profundo)'
    '#3A3A3A' = 'var(--cinza-medio)'
    '#F5F5F5' = 'var(--branco-suave)'
    '#ffffff' = 'var(--branco-puro)'
    '#E0E0E0' = 'var(--texto-claro)'
    '#B0B0B0' = 'var(--texto-medio)'
    '#666' = 'var(--texto-escuro)'
    '#333' = 'var(--texto-muito-escuro)'
    '#6c757d' = 'var(--texto-cinza)'
    '#888' = 'var(--texto-cinza-claro)'
    '#555' = 'var(--texto-cinza-escuro)'
    '#1a365d' = 'var(--texto-azul-escuro)'
    '#64748b' = 'var(--texto-azul-medio)'
    '#2c3e50' = 'var(--texto-azul-claro)'
    '#495057' = 'var(--texto-cinza-medio)'
    '#f8f9fa' = 'var(--fundo-claro)'
    '#f0f8ff' = 'var(--fundo-muito-claro)'
    '#e9ecef' = 'var(--fundo-cinza-claro)'
    '#22c55e' = 'var(--cor-sucesso)'
    '#ef4444' = 'var(--cor-erro)'
    '#f39c12' = 'var(--cor-aviso)'
    '#3498db' = 'var(--cor-info)'
    '#2980b9' = 'var(--cor-info-hover)'
    '#c0392b' = 'var(--cor-perigo)'
    '#34495e' = 'var(--cor-azul-escuro)'
    '#3b5998' = 'var(--facebook)'
    '#1da1f2' = 'var(--twitter)'
    '#0077b5' = 'var(--linkedin)'
    '#25d366' = 'var(--whatsapp)'
    '#128C7E' = 'var(--whatsapp-escuro)'
    '#C8A96E' = 'var(--dourado-principal)'
}

# Ler o conteúdo do arquivo
$content = Get-Content $filePath -Raw

# Fazer backup
$backupPath = $filePath + ".backup"
Copy-Item $filePath $backupPath

Write-Host "Backup criado em: $backupPath"

# Substituir cores (exceto na seção :root)
$lines = $content -split "`n"
$inRootSection = $false
$newLines = @()

for ($i = 0; $i -lt $lines.Count; $i++) {
    $line = $lines[$i]
    
    # Detectar início e fim da seção :root
    if ($line -match "^\s*:root\s*\{") {
        $inRootSection = $true
    } elseif ($inRootSection -and $line -match "^\s*\}") {
        $inRootSection = $false
    }
    
    # Se não estiver na seção :root, fazer substituições
    if (-not $inRootSection) {
        foreach ($color in $colorMappings.Keys) {
            $variable = $colorMappings[$color]
            $line = $line -replace [regex]::Escape($color), $variable
        }
    }
    
    $newLines += $line
}

# Salvar o arquivo modificado
$newContent = $newLines -join "`n"
Set-Content $filePath $newContent -Encoding UTF8

Write-Host "Substituições concluídas!"
Write-Host "Cores substituídas por variáveis CSS no arquivo: $filePath"