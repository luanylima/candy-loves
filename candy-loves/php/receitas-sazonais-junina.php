<?php
require_once '../config/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎪 Receitas de Festa Junina - Candy Love's</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdd835 0%, #ff9800 50%, #f57c00 100%);
            color: #333;
            min-height: 100vh;
        }
        
        .header {
            background: linear-gradient(135deg, #d32f2f 0%, #f57c00 100%);
            padding: 40px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            border-bottom: 4px dashed #fdd835;
            position: relative;
            overflow: hidden;
        }
        
        .header::before, .header::after {
            content: '🎉 🎊 🎪';
            position: absolute;
            font-size: 2rem;
            opacity: 0.3;
            animation: bounce 2s infinite;
        }
        
        .header::before { left: 20px; animation-delay: 0s; }
        .header::after { right: 20px; animation-delay: 0.5s; }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            font-family: 'Playfair Display', serif;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        
        .header p {
            font-size: 1.3rem;
            color: #fff;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .section-title {
            color: #d32f2f;
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
            background: linear-gradient(135deg, #fff 0%, #fff9e6 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(211,47,47,0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 3px solid #d32f2f;
            animation: popIn 0.6s ease forwards;
            position: relative;
        }
        
        .receita-card::before {
            content: '🎪';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            opacity: 0.5;
            z-index: 1;
        }
        
        @keyframes popIn {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }
        
        .receita-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 16px 48px rgba(211,47,47,0.4);
            border-color: #fdd835;
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
            color: #d32f2f;
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
            background: linear-gradient(135deg, #d32f2f 0%, #f57c00 100%);
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
            box-shadow: 0 6px 16px rgba(211,47,47,0.4);
        }
        
        .back-btn {
            display: inline-block;
            background: #fdd835;
            color: #d32f2f;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }
        
        .back-btn:hover {
            transform: translateX(-5px);
            box-shadow: 0 6px 16px rgba(253,216,53,0.4);
        }
        
        footer {
            text-align: center;
            padding: 30px;
            background: rgba(211,47,47,0.1);
            color: #d32f2f;
            border-top: 4px dashed #fdd835;
            margin-top: 50px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>🎪 FESTA JUNINA 🎪</h1>
    <p>🌽 Receitas típicas para celebrar as festas juninas! 🌽</p>
</div>

<div class="container">
    <a href="cliente-dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar</a>
    
    <h2 class="section-title">Receitas Típicas de Festa Junina</h2>
    
    <div class="receitas-grid">
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSDgdwkjxrDOmMIg9UJmk0_b8YepaWsPI6TA&s" alt="Bolo de Milho">
            <div class="receita-content">
                <h3>🌽 Bolo de Milho</h3>
                <p>Clássico bolo de milho cremoso. Uma delícia tipicamente junina!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 45min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://docesdajessica.com.br/wp-content/uploads/2020/06/Imagem-destacada-blog-16-300x158.png.webp" alt="Arroz Doce">
            <div class="receita-content">
                <h3>🍚 Arroz Doce</h3>
                <p>Doce típico de festa junina. Tradicional e irresistível!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 30min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReT8cAQ_4utcpOlfdVhVBC2I55FYj8tWRRhg&s" alt="Pamonha">
            <div class="receita-content">
                <h3>🌾 Pamonha</h3>
                <p>Clássica pamonha junina feita com milho fresco. Sensacional!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 50min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkzPSc2UGhHy2c-mOEW2K_X3tikNZuj4dOEA&s" alt="Broa de Milho">
            <div class="receita-content">
                <h3>🍞 Broa de Milho</h3>
                <p>Pão tradicional de festa junina. Perfeito com manteiga!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 40min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Médio</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://i.pinimg.com/736x/22/9c/87/229c87c3daa5787325c8533da0e5f54e.jpg" alt="Milho Cozido">
            <div class="receita-content">
                <h3>🌽 Milho na Manteiga</h3>
                <p>Milho cozido quentinho com manteiga. Simples e delicioso!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 20min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
        
        <div class="receita-card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnLSfrVpl7G8H6uNkRv34qqcZbDP_tzLysUg&s" alt="Caldo de Milho">
            <div class="receita-content">
                <h3>🍲 Caldo de Milho</h3>
                <p>Quentinha e reconfortante. Perfeita para noites de festa!</p>
                <div class="receita-meta">
                    <div class="meta-item"><i class="fas fa-clock"></i> 35min</div>
                    <div class="meta-item"><i class="fas fa-fire"></i> Fácil</div>
                </div>
                <button class="receita-btn">🎪 Ver Receita</button>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>🎪 Aproveite a festa! Que suas receitas sejam deliciosas! 🎪</p>
</footer>

</body>
</html>