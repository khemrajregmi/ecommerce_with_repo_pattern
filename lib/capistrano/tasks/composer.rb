namespace :composer do
  desc “Running Composer Install”
task :install do
  on roles(:app), in: :sequence, wait: 5 do
    within release_path do
      execute :composer, “install —no-dev —no-scripts —quiet —optimize-autoloader”
    end
  end
end

desc “Running Composer Dump Autoload”
task :install do
  on roles(:app), in: :sequence, wait: 5 do
    within release_path do
      execute :composer, “dump-autoload”
    end
  end
end
end


namespace :deploy do
  after :updated, "composer:update"
  after :updated, "composer:install"
end


