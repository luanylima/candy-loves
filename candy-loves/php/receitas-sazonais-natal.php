<?php
require_once '../config/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎄 Receitas de Natal - Candy Love's</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0d3b2d 0%, #1a5c4a 50%, #0d3b2d 100%);
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Efeito de neve */
        .snowflake {
            position: fixed;
            top: -10px;
            z-index: 1;
            user-select: none;
            cursor: default;
            color: #fff;
            font-size: 1em;
            font-family: Arial, sans-serif;
            text-shadow: 0 0 5px rgba(255,255,255,0.8);
            animation: snowfall linear infinite;
        }
        
        @keyframes snowfall {
            to { transform: translateY(100vh) rotate(360deg); }
        }
        
        .header {
            background: linear-gradient(135deg, #c41e3a 0%, #165e4a 100%);
            padding: 40px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            border-bottom: 3px solid #ffd700;
            position: relative;
            overflow: hidden;
        }
        
        .header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #ffd700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 1.3rem;
            color: #fff;
            font-weight: 600;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .section-title {
            color: #ffd700;
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 50px;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .receitas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .receita-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(230,230,230,0.95) 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid #c41e3a;
            transform: scale(1);
            animation: popIn 0.6s ease forwards;
        }
        
        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .receita-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 16px 48px rgba(196, 30, 58, 0.4);
            border-color: #ffd700;
        }
        
        .receita-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        
        .receita-card:hover img {
            transform: scale(1.1);
        }
        
        .receita-content {
            padding: 25px;
            color: #0d3b2d;
        }
        
        .receita-content h3 {
            color: #c41e3a;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }
        
        .receita-content p {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .receita-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .receita-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #c41e3a 0%, #165e4a 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .receita-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(196, 30, 58, 0.4);
        }
        
        .back-btn {
            display: inline-block;
            background: #ffd700;
            color: #0d3b2d;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            transform: translateX(-5px);
            box-shadow: 0 6px 16px rgba(255,215,0,0.4);
        }
        
        footer {
            text-align: center;
            padding: 30px;
            background: rgba(0,0,0,0.3);
            color: #ffd700;
            border-top: 2px solid #c41e3a;
            margin-top: 50px;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .header h1 { font-size: 2.5rem; }
            .section-title { font-size: 2rem; }
            .receitas-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Neve caindo -->
<script>
    function createSnowflake() {
        const snowflake = document.createElement('div');
        snowflake.className = 'snowflake';
        snowflake.innerHTML = '❄';
        snowflake.style.left = Math.random() * window.innerWidth + 'px';
        snowflake.style.animationDuration = (Math.random() * 3 + 2) + 's';
        snowflake.style.fontSize = (Math.random() * 1.5 + 0.5) + 'rem';
        document.body.appendChild(snowflake);
        
        setTimeout(() => snowflake.remove(), 5000);
    }
    
    setInterval(createSnowflake, 300);
</script>

<div class="header">
    <h1>🎄 RECEITAS DE NATAL 🎄</h1>
    <p>✨ Receitas especiais para decorar sua festa natalina ✨</p>
</div>

<div class="container">
    <a href="cliente-dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar</a>
    
    <h2 class="section-title">Receitas Natalinas Especiais</h2>
    
    <div class="receitas-grid">
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSDgdwkjxrDOmMIg9UJmk0_b8YepaWsPI6TA&s" alt="Bolo de Natal">
            <div class="receita-content">
                <h3>🎄 Bolo Natalino</h3>
                <p>Delicioso bolo de chocolate com cobertura de frutas vermelhas, perfeito para a ceia de Natal.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 45min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1w2k5YojbhBEjEqOzqnvP_TYIP67CnJMhZA&s" alt="Suspiro">
            <div class="receita-content">
                <h3>🍿 Suspiro Natalino</h3>
                <p>Doce tradicional de Natal com sabor inigualável. Uma verdadeira delícia que todos vão amar!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 30min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://i.pinimg.com/736x/22/9c/87/229c87c3daa5787325c8533da0e5f54e.jpg" alt="Torta Natalina">
            <div class="receita-content">
                <h3>🎅 Torta Natalina</h3>
                <p>Torta salgada festiva com ingredientes especiais da época natalina. Irresistível!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 50min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://docesdajessica.com.br/wp-content/uploads/2023/07/Imagem-destacada-Blog-2-750x394.png.webp" alt="Pudim Natalino">
            <div class="receita-content">
                <h3>🔴 Pudim Festivo</h3>
                <p>Pudim com calda de chocolate e decoração natalina. Sobremesa perfeita para a ceia.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 40min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkzPSc2UGhHy2c-mOEW2K_X3tikNZuj4dOEA&s" alt="Brigadeiro Natalino">
            <div class="receita-content">
                <h3>⛄ Brigadeiro Natalino</h3>
                <p>Brigadeiro com especiarias natalinas. Perfeito para presentear seus amigos e família!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 25min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://i.ytimg.com/vi/x-HIyExqe4g/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCu1Usj3TGIPApaSdCRUCIg8K8ikA" alt="Docinhos">
            <div class="receita-content">
                <h3>🎀 Docinhos Natalinos</h3>
                <p>Diferentes tipos de docinhos decorados com cores natalinas. Sucesso garantido!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 35min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>🎄 Feliz Natal! Que suas receitas sejam deliciosas! 🎄</p>
</footer>

</body>
</html>