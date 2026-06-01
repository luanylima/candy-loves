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
            background: linear-gradient(135deg, #FFFFFF 0%, #F8FFFE 50%, #FFFFFF 100%);
            color: #333;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(200, 80, 80, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(100, 200, 100, 0.02) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        /* Flocos de neve caindo */
        .snowflake {
            position: fixed;
            z-index: 2;
            user-select: none;
            cursor: default;
            font-size: 2.5em;
            text-shadow: 0 0 10px rgba(255,255,255,0.8);
            animation: snowfall linear infinite;
            opacity: 0.9;
            filter: drop-shadow(0 0 4px rgba(255,255,255,0.8));
            color: #FFFFFF;
        }

        @keyframes snowfall {
            0% {
                transform: translateY(-50px) translateX(0) rotate(0deg) scaleY(1);
                opacity: 1;
            }
            50% {
                opacity: 0.9;
            }
            100% { 
                transform: translateY(100vh) translateX(var(--sway-amount)) rotate(720deg) scaleY(0.8);
                opacity: 0;
            }
        }

        /* Estrela de Natal */
        .christmas-star {
            position: fixed;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 4;
            font-size: 5rem;
            animation: star-twinkle 2.5s ease-in-out infinite;
            text-shadow: 0 0 25px rgba(220, 20, 60, 0.8);
            filter: drop-shadow(0 0 15px rgba(220, 20, 60, 0.8));
            color: #FFD700;
        }

        @keyframes star-twinkle {
            0%, 100% { opacity: 1; transform: translateX(-50%) scale(1); }
            50% { opacity: 0.7; transform: translateX(-50%) scale(1.15); }
        }

        /* Pisca-pisca (luzes natalinas) */
        .light {
            position: fixed;
            z-index: 3;
            border-radius: 50%;
            box-shadow: 0 0 12px currentColor;
            animation: blink 1.6s ease-in-out infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 0.2; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        .light.red { color: #DC143C; }
        .light.green { color: #228B22; }
        .light.gold { color: #FFD700; }
        .light.white { color: #FFFFFF; }
        
        .header {
            background: linear-gradient(135deg, #DC143C 0%, #228B22 100%);
            padding: 80px 40px 60px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            border-bottom: 6px solid #FFD700;
            position: relative;
            overflow: hidden;
            margin-top: 0;
        }

        .header::before, .header::after {
            content: '';
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            opacity: 0.05;
        }

        .header::before {
            left: -60px;
            top: -60px;
            background: #fff;
        }

        .header::after {
            right: -60px;
            bottom: -60px;
            background: #FFD700;
        }

        .header-content {
            position: relative;
            z-index: 2;
            animation: slideDown 0.8s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .header h1 {
            font-size: 3.8rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #FFD700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            margin-bottom: 15px;
            letter-spacing: 2px;
        }
        
        .header p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.98);
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.15);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
            z-index: 2;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
            animation: fadeInUp 1s ease 0.3s both;
        }
        
        .section-title {
            color: #DC143C;
            font-size: 3rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.08);
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .section-subtitle {
            color: #333;
            font-size: 1.1rem;
            font-weight: 400;
        }

        .decorative-divider {
            width: 150px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #DC143C, #FFD700, #228B22, #DC143C, transparent);
            margin: 20px auto;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .receitas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .receita-card {
            background: linear-gradient(135deg, #FFFFFF 0%, #FFFAFF 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
            border: 2px solid #DC143C;
            position: relative;
            cursor: pointer;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .receita-card:nth-child(1) { animation: popIn 0.6s ease 0.1s both; }
        .receita-card:nth-child(2) { animation: popIn 0.6s ease 0.2s both; }
        .receita-card:nth-child(3) { animation: popIn 0.6s ease 0.3s both; }
        .receita-card:nth-child(4) { animation: popIn 0.6s ease 0.4s both; }
        .receita-card:nth-child(5) { animation: popIn 0.6s ease 0.5s both; }
        .receita-card:nth-child(6) { animation: popIn 0.6s ease 0.6s both; }
        
        .receita-card:hover {
            box-shadow: 0 12px 35px rgba(220, 20, 60, 0.2);
            border-color: #FFD700;
        }

        .receita-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: linear-gradient(135deg, #F0F8FF 0%, #FFFAFF 100%);
        }

        .receita-image-wrapper::before {
            content: '✨';
            position: absolute;
            font-size: 5rem;
            opacity: 0.08;
            right: -20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }
        
        .receita-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .receita-card:hover img {
            transform: scale(1.05);
        }

        .receita-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #DC143C 0%, #8B0000 100%);
            color: #FFD700;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 3;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
            border: 2px solid #FFD700;
        }

        .receita-content {
            padding: 25px;
            color: #333;
        }
        
        .receita-content h3 {
            color: #DC143C;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .receita-emoji {
            font-size: 1.6rem;
            display: inline-block;
        }
        
        .receita-content p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .receita-meta {
            display: flex;
            gap: 12px;
            margin-bottom: 18px;
            font-size: 0.85rem;
            color: #777;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, rgba(220, 20, 60, 0.06) 0%, rgba(255, 215, 0, 0.04) 100%);
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 600;
        }

        .meta-item i {
            color: #DC143C;
            font-size: 0.9rem;
        }
        
        .receita-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #DC143C 0%, #228B22 100%);
            color: #FFD700;
            border: 2px solid #FFD700;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: opacity 0.2s ease;
            box-shadow: 0 4px 12px rgba(220, 20, 60, 0.2);
        }

        .receita-btn:hover {
            opacity: 0.9;
        }

        .receita-btn:active {
            opacity: 0.8;
        }
        
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #FFD700 0%, #FFC700 100%);
            color: #DC143C;
            padding: 12px 30px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 30px;
            transition: opacity 0.2s ease;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.2);
            border: 2px solid #DC143C;
            font-size: 1rem;
        }
        
        .back-btn:hover {
            opacity: 0.9;
        }

        footer {
            text-align: center;
            padding: 35px 20px;
            background: linear-gradient(135deg, rgba(220, 20, 60, 0.04) 0%, rgba(34, 139, 34, 0.04) 100%);
            color: #DC143C;
            border-top: 3px solid #FFD700;
            margin-top: 60px;
            font-weight: 600;
            font-size: 1.1rem;
            position: relative;
            z-index: 2;
        }

        footer p {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .header {
                padding: 50px 20px 40px;
            }

            .header h1 {
                font-size: 2.5rem;
            }

            .header p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .receitas-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .christmas-star {
                font-size: 3.5rem;
                top: 40px;
            }
        }
    </style>
</head>
<body>

<!-- Estrela de Natal no topo -->
<div class="christmas-star">⭐</div>

<!-- Pisca-pisca (luzes natalinas) -->
<script>
    // Criar luzes pisca-pisca
    function createLights() {
        const colors = ['red', 'green', 'gold', 'white'];
        const positions = [
            { top: '12%', left: '5%' },
            { top: '18%', right: '6%' },
            { top: '25%', left: '8%' },
            { top: '32%', right: '9%' },
            { bottom: '18%', left: '7%' },
            { bottom: '12%', right: '5%' },
            { bottom: '25%', left: '10%' },
            { bottom: '20%', right: '8%' }
        ];

        positions.forEach((pos, index) => {
            const light = document.createElement('div');
            light.className = `light ${colors[index % colors.length]}`;
            light.style.width = '14px';
            light.style.height = '14px';
            Object.assign(light.style, pos);
            light.style.animationDelay = (index * 0.25) + 's';
            document.body.appendChild(light);
        });
    }

    createLights();

    // Criar floquinhos de neve com mais frequência
    function createSnowflake() {
        const snowflake = document.createElement('div');
        snowflake.className = 'snowflake';
        
        const emojis = ['❄', '❅', '❆', '✿', '⛄'];
        snowflake.innerHTML = emojis[Math.floor(Math.random() * emojis.length)];
        
        const posX = Math.random() * window.innerWidth;
        snowflake.style.left = posX + 'px';
        
        const duration = Math.random() * 8 + 8;
        const swayAmount = (Math.random() - 0.5) * 200;
        snowflake.style.setProperty('--sway-amount', swayAmount + 'px');
        snowflake.style.animationDuration = duration + 's';
        
        document.body.appendChild(snowflake);
        
        setTimeout(() => snowflake.remove(), duration * 1000);
    }
    
    // Criar flocos a cada 300ms para mais densidade
    setInterval(createSnowflake, 300);
</script>

<div class="header">
    <div class="header-content">
        <h1>🎄 RECEITAS DE NATAL 🎄</h1>
        <p>✨ Receitas especiais para sua ceia natalina ✨</p>
    </div>
</div>

<div class="container">
    <a href="cliente-dashboard.php" class="back-btn">
        <i class="fas fa-arrow-left"></i> 
        <span>Voltar</span>
    </a>
    
    <div class="section-header">
        <h2 class="section-title">Receitas Natalinas Especiais</h2>
        <div class="decorative-divider"></div>
        <p class="section-subtitle">Explore nossas deliciosas receitas tradicionais de Natal</p>
    </div>
    
    <div class="receitas-grid">
        <div class="receita-card">
            <div class="receita-badge">🎄 FAVORITO</div>
            <div class="receita-image-wrapper">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSDgdwkjxrDOmMIg9UJmk0_b8YepaWsPI6TA&s" alt="Bolo de Natal">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">🎄</span> Bolo Natalino</h3>
                <p>Delicioso bolo de chocolate com cobertura de frutas vermelhas.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 45min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Médio</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <div class="receita-badge">⭐ TOP PICK</div>
            <div class="receita-image-wrapper">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1w2k5YojbhBEjEqOzqnvP_TYIP67CnJMhZA&s" alt="Suspiro">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">🍿</span> Suspiro Natalino</h3>
                <p>Doce tradicional de Natal com sabor inigualável.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 30min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <div class="receita-badge">🔔 CLÁSSICO</div>
            <div class="receita-image-wrapper">
                <img src="https://i.pinimg.com/736x/22/9c/87/229c87c3daa5787325c8533da0e5f54e.jpg" alt="Torta Natalina">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">🎅</span> Torta Natalina</h3>
                <p>Torta salgada festiva com ingredientes especiais.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 50min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Médio</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <div class="receita-badge">🍮 SOBREMESA</div>
            <div class="receita-image-wrapper">
                <img src="https://docesdajessica.com.br/wp-content/uploads/2023/07/Imagem-destacada-Blog-2-750x394.png.webp" alt="Pudim Natalino">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">🔴</span> Pudim Festivo</h3>
                <p>Pudim com calda de chocolate e decoração natalina.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 40min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <div class="receita-badge">🔥 POPULAR</div>
            <div class="receita-image-wrapper">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkzPSc2UGhHy2c-mOEW2K_X3tikNZuj4dOEA&s" alt="Brigadeiro Natalino">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">⛄</span> Brigadeiro Natalino</h3>
                <p>Brigadeiro com especiarias natalinas para presentear.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 25min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎁 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <div class="receita-badge">🎁 ESPECIAL</div>
            <div class="receita-image-wrapper">
                <img src="https://i.ytimg.com/vi/x-HIyExqe4g/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCu1Usj3TGIPApaSdCRUCIg8K8ikA" alt="Docinhos">
            </div>
            <div class="receita-content">
                <h3><span class="receita-emoji">🎀</span> Docinhos Natalinos</h3>
                <p>Diferentes tipos de docinhos com cores natalinas.</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 35min</div>
                    <div class="meta-item"><i class="fas fa-star"></i> Médio</div>
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