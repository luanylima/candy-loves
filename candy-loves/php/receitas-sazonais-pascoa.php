<?php
require_once '../config/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐰 Receitas de Páscoa - Candy Love's</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 50%, #f48fb1 100%);
            color: #333;
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
            padding: 40px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            border-bottom: 3px solid #ffd700;
        }
        
        .header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
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
            color: #ff1493;
            font-size: 2.5rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 50px;
            font-family: 'Playfair Display', serif;
        }
        
        .receitas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .receita-card {
            background: linear-gradient(135deg, #fff 0%, #ffe0f0 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(255,105,180,0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid #ff69b4;
            animation: popIn 0.6s ease forwards;
        }
        
        @keyframes popIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .receita-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 16px 48px rgba(255,20,147,0.4);
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
        }
        
        .receita-content h3 {
            color: #ff1493;
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
        
        .receita-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff69b4 0%, #ff1493 100%);
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
            box-shadow: 0 6px 16px rgba(255,20,147,0.4);
        }
        
        .back-btn {
            display: inline-block;
            background: #ffd700;
            color: #ff1493;
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
            background: rgba(255,105,180,0.1);
            color: #ff1493;
            border-top: 2px solid #ff69b4;
            margin-top: 50px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>🐰 RECEITAS DE PÁSCOA 🐰</h1>
    <p>🥚 Receitas especiais para decorar sua Páscoa 🥚</p>
</div>

<div class="container">
    <a href="cliente-dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar</a>
    
    <h2 class="section-title">Receitas Pascais Deliciosas</h2>
    
    <div class="receitas-grid">
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSDgdwkjxrDOmMIg9UJmk0_b8YepaWsPI6TA&s" alt="Bolo de Páscoa">
            <div class="receita-content">
                <h3>🐰 Bolo de Páscoa</h3>
                <p>Bolo fofinho decorado com ovos de chocolate. Perfeito para celebrar a Páscoa!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 45min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://anamariabrogui.com.br/assets/uploads/receitas/fotos/usuario-3405-d7c50f8f1e1d16ef3a40d31fd288775d.jpg" alt="Torta de Páscoa">
            <div class="receita-content">
                <h3>🥕 Torta Pascalina</h3>
                <p>Torta decorada com tema de Páscoa. Uma verdadeira obra de arte culinária!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 50min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReT8cAQ_4utcpOlfdVhVBC2I55FYj8tWRRhg&s" alt="Brigadeiro Pascalino">
            <div class="receita-content">
                <h3>🌸 Brigadeiro Pascalino</h3>
                <p>Brigadeiro decorado com cores pastel. Ideal para presentear nesta Páscoa!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 30min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://docesdajessica.com.br/wp-content/uploads/2023/07/Imagem-destacada-Blog-2-750x394.png.webp" alt="Pudim de Páscoa">
            <div class="receita-content">
                <h3>🍮 Pudim Pascalino</h3>
                <p>Pudim com decoração temática de Páscoa. Sobremesa refrescante e deliciosa!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 40min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkzPSc2UGhHy2c-mOEW2K_X3tikNZuj4dOEA&s" alt="Docinhos de Páscoa">
            <div class="receita-content">
                <h3>🐣 Docinhos Pascais</h3>
                <p>Docinhos coloridos com formato de ovos. Adoráveis para comemorar!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 35min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://i.pinimg.com/736x/22/9c/87/229c87c3daa5787325c8533da0e5f54e.jpg" alt="Biscoitos Pascalinos">
            <div class="receita-content">
                <h3>🐰 Biscoitos Pascalinos</h3>
                <p>Biscoitos decorados com formatos de Páscoa. Perfeitos para acompanhar o café!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 25min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🥚 Ver Receita</button>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>🐰 Feliz Páscoa! Que suas receitas sejam deliciosas! 🐰</p>
</footer>

</body>
</html>