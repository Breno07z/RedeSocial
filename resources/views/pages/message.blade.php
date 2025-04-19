<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTHCONNECT</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }
        
        .container {
            text-align: center;
        }
        
        h1 {
            font-size: 8vw;
            color: white;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            margin: 0;
            position: relative;
            opacity: 0;
            transform: scale(0.5);
            animation: aparecer 2s forwards 0.5s;
        }
        
        .health {
            display: inline-block;
            animation: pulse 1.5s infinite alternate;
        }
        
        .connect {
            display: inline-block;
            animation: pulse 1.5s infinite alternate 0.5s;
        }
        
        .loading {
            width: 100px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            margin: 30px auto;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }
        
        .loading:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: white;
            animation: carregar 3s forwards;
        }
        
        @keyframes aparecer {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes pulse {
            from {
                transform: scale(1);
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
            }
            to {
                transform: scale(1.1);
                text-shadow: 0 0 20px rgba(255, 255, 255, 1), 0 0 30px rgba(255, 255, 255, 0.6);
            }
        }
        
        @keyframes carregar {
            to {
                width: 100%;
            }
        }
        
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: flutuar linear infinite;
        }
        
        @keyframes flutuar {
            to {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <h1>
            <span class="health">HEALTH</span>
            <span class="connect">CONNECT</span>
        </h1>
        <div class="loading"></div>
    </div>

    <script>
        // Cria partículas flutuantes
        function criarParticulas() {
            const particles = document.getElementById('particles');
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamanho aleatório entre 2px e 6px
                const size = Math.random() * 4 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                
                // Posição aleatória
                particle.style.left = `${Math.random() * 100}vw`;
                particle.style.bottom = `-10px`;
                
                // Animação com duração aleatória
                const duration = Math.random() * 10 + 5;
                particle.style.animationDuration = `${duration}s`;
                
                // Atraso aleatório
                particle.style.animationDelay = `${Math.random() * 5}s`;
                
                particles.appendChild(particle);
            }
        }
        
        // Inicia a animação
        window.onload = function() {
            criarParticulas();
            
            // Depois de 4 segundos, redireciona para register.html
            setTimeout(function() {
                window.location.href = '{{ route('pages.Registro')}}';
            }, 4000);
        };
    </script>
</body>
</html>