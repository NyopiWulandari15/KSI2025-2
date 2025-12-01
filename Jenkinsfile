pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/NyopiWulandari15/KSI2025-2.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                powershell 'composer install'
            }
        }

        stage('Run PHPUnit Tests') {
            steps {
                powershell 'php ./vendor/bin/phpunit ./tests'
            }
        }
    }
}
