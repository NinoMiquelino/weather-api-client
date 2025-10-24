## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🌦️ PHP POO Weather Client (OpenWeatherMap & cURL)

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/weather-api-client?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/weather-api-client?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/weather-api-client)

Este projeto marca a transição para a Programação Orientada a Objetos (POO) em PHP. Ele simula uma aplicação de cliente de API, encapsulando a complexidade da comunicação HTTP e formatação de dados dentro de uma classe reutilizável (`WeatherClient.php`).

---

## 🧱 Arquitetura e POO

* **Encapsulamento:** A lógica de obtenção de dados e a formatação (limpeza e conversão de Celsius, velocidade do vento) são separadas em métodos dedicados dentro da classe `WeatherClient`.
* **cURL:** Utiliza a biblioteca cURL, o padrão da indústria em PHP para fazer requisições HTTP externas com controle total sobre timeouts e erros, mais robusto que `file_get_contents`.
* **Tratamento de Erros:** A classe lida com erros de rede (cURL) e erros de lógica da API (códigos HTTP e mensagens JSON), retornando feedback claro ao frontend.

---

## 🧠 Tecnologias utilizadas

* **Backend:** PHP 7.4+ (POO, Classes, Construtores).
* **Comunicação:** cURL (extensão PHP).
* **API Externa:** OpenWeatherMap API (dados de clima).
* **Frontend:** HTML5, JavaScript Vanilla (`fetch` API) e Tailwind CSS.

---

## 🧩 Estrutura do Projeto

```
weather-api-client/
├── index.html
├── api.php
├── WeatherClient.php
├── README.md
├── .gitignore
└── LICENSE
```
---

## ⚙️ Configuração e Instalação

### Pré-requisitos Críticos

1.  Um ambiente de servidor web com PHP.
2.  **Extensão cURL habilitada** no seu `php.ini` (geralmente `extension=curl` ou `extension=php_curl.dll`).
3.  **CHAVE DE API:** Você precisa de uma chave de API gratuita do [OpenWeatherMap](https://openweathermap.org/api).

### 1. Configurar a Chave de API

Você DEVE substituir o placeholder da chave na classe PHP.

No arquivo `src/WeatherClient.php`, altere a linha:

```php
$this->apiKey = 'SUA_CHAVE_AQUI'; 
```

para a sua chave real.

​2. Estrutura e Execução

1. Crie a estrutura de pastas conforme o diagrama.

2. Execute o servidor embutido do PHP (a partir da raiz do projeto):



---

​## 📝 Instruções de Uso

​Acesse a página. O clima da cidade padrão (Rio de Janeiro) deve ser carregado.
​Digite o nome de qualquer cidade (Ex: Tóquio, Londres, Curitiba).
​Clique em "Buscar Clima".
​O JavaScript enviará a cidade como parâmetro para o src/api.php.
​O api.php instanciará o WeatherClient e usará o método getWeather (que usa cURL) para obter e formatar os dados antes de devolvê-los ao frontend para exibição.

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/weather-api-client/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/weather-api-client/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
